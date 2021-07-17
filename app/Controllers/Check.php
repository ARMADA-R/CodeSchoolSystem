<?php namespace App\Controllers;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
use App\Models\UserModel;
// use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;
class Check extends Controller
{  use ResponseTrait;
    
    public function check(){
    $kunci='SChO0lS';
    $request = service('request');
   $test= $request->getHeader('Authorization');
  if(!$test){
    $response = [
        'code' => -1,
        'msg' => '',
        'messages' =>'Please insert Authorization token'
    ];
    return $response;
  }
  else{
        $token = $test->getValue();
        
        try {
            (   $decoded = JWT::decode($token, $kunci, array("HS256")));
            $response = [
                            'code' => 1,
                            'msg' => 'success',
                            
                            'data' => $decoded
                        ];
                    
                       
                    //    echo json_encode($response);
                    return $response;
                    
        } catch (\InvalidArgumentException $e) {
            $response = [
                'code' => -1,
                'msg' => 'fail',
                'messages' =>'Key may not be empty'
            ];
            return $response;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            $response = [
                'code' => -1,
                'msg' => 'fail',
                'messages' =>'Signature verification failed'
            ];
            return $response;
        } catch (\Firebase\JWT\BeforeValidException $e) {
            $response = [
                'code' => -1,
                'msg' => 'fail',
                'messages' =>'Cannot handle token'
            ];
            return $response;
            // Cannot handle token prior to <datetime>
        } catch (\Firebase\JWT\ExpiredException $e) {
            $response = [
                            'code' => -1,
                            'msg' => 'fail',
                            'messages' =>'Expired token'
                        ];
                        return $response;
        } catch (\UnexpectedValueException $e) {
            
            $response = [
                'code' => -1,
                'msg' => 'fail',
                'messages' =>'Invalid signature encoding'
            ];
            return $response;
            
        } catch (\DomainException $e) {
            $response = [
                'code' => -1,
                'msg' => 'fail',
                'messages' =>'Invalid signature encoding'
            ];
            return $response;
        } catch (\Exception $e) {
            $response = [
                            'status' => 401,
                            'error' => TRUE,
                            'messages' => 'Access denied'
                        ];
                        return $response;
            // NA
        }
  }
 
    
}

}
