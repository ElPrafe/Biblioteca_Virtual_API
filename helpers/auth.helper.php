<?php
require_once './api/models/login.model.php';
class AuthHelper
{
    // Define la clave secreta utilizada para firmar el token
    private $secretKey = 'segundo_francia';
    private $usuario;
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->usuario = null;
    }

    public function validarPermisos()
    {
        $header = apache_request_headers();
        if (!isset($header['Authorization']))
            return null;
        $authorization = $header['Authorization'];
        $params = explode(' ', $authorization);
        $token = $params[1];
        $idUsuario = $this->comprobarToken($token);
        if ($idUsuario) {
            //Buscamos el usuario en la DB y lo guardamos en la clase
            $this->usuario = $this->loginModel->getUsuario(null, $idUsuario);
            return true;
        } else
            return null;
    }

    public function validarToken(){
        $header = apache_request_headers();
        if (!isset($header['Authorization']))
            return null;
        $authorization = $header['Authorization'];
        $params = explode(' ', $authorization);
        $token = $params[1];
        $idUsuario = $this->comprobarToken($token);
        if ($idUsuario) {        
            return true;
        } else
            return null;
    }

    public function getToken($usuario)
    {
        $userData = [
            'usuario' => $usuario->usuario,            
        ];

        // Define los datos del token (payload)
        $tokenData = [
            'sub' => $usuario->usuario, // Identificador del usuario
            'iat' => time(), // Fecha de emisión del token
            'exp' => time() + 3600, // Fecha de vencimiento del token (1 hora)
            'data' => $userData // Datos adicionales del usuario
        ];

        // Genera el token JWT
        $header = json_encode(['alg' => 'HS256', 'typ' => 'JWT']);
        $header = base64_encode($header);

        $payload = json_encode($tokenData);
        $payload = base64_encode($payload);

        $signature = hash_hmac('sha256', "$header.$payload", $this->secretKey, true);
        $signature = base64_encode($signature);

        $token = "$header.$payload.$signature";
        return ['token' => $token];
    }

    private function comprobarToken($token)
    {
        // Divide el token en sus componentes: encabezado, payload y firma
        [$header, $payload, $signature] = explode('.', $token);

        // Decodifica el encabezado y el payload
        $headerData = json_decode(base64_decode($header), true);
        $payloadData = json_decode(base64_decode($payload), true);

        // Verifica la firma del token
        $hash = hash_hmac('sha256', "$header.$payload", $this->secretKey, true);
        $signatureData = base64_decode($signature);
        $isSignatureValid = hash_equals($hash, $signatureData);

        if ($isSignatureValid) {
            // Verifica la fecha de vencimiento
            $currentTimestamp = time();
            $expirationTimestamp = $payloadData['exp'];
            if ($currentTimestamp <= $expirationTimestamp) {
                // El token no ha expirado
                return $payloadData['sub']; // identificador del usuario del payload
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
}