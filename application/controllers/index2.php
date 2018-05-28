<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';


$app = new \Slim\App;

// Routes
$app->group('/api', function () use ($app) {
 
    // Version group
    $app->group('/v1', function () use ($app) {
		$app->get('/teachers', 'getTeachersResearch');
      
        
	});
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$corsOptions = array(
    "origin" => "*",
    "exposeHeaders" => array("Content-Type", "X-Requested-With", "X-authentication", "X-client"),
    "allowMethods" => array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS')
);
$cors = new \CorsSlim\CorsSlim($corsOptions);
 
$app->add($cors);

$app->run();

// Connect Database Code
function getConnection() {
    $dbhost="103.86.50.206";
    $dbuser="profile_teacher";
    $dbpass="profile_teacher01";
    $dbname="profile_teacher";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query('set names utf8');
    return $dbh;
}

function getTeachersResearch($request, $response) {
    $sql = "SELECT port_research.res_id, res_eproject, 	res_tproject, res_etitle, res_ttitle,res_place,res_date, rsd_efname, rsd_elname, rsd_tfname, rsd_tlname, rst_ttitle, usr_tfname, usr_tlname
	, usr_efname, usr_elname,acr_tacronym,dep_tname,dep_ename
    FROM port_research 
	LEFT JOIN port_researcher ON port_researcher.rer_id = port_research.rer_id
	LEFT JOIN port_user ON port_user.usr_id = port_research.usr_id
	left join port_academictitle on port_academictitle.acr_id = port_user.acr_id
	left join port_department on port_department.dep_id = port_user.dep_id
	";
	
				
	
    try {
        $db = getConnection();

        $result = null;

        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Data Not Found'),422);
        }
        $db=null;
               
    }
    catch(\PDOException $ex){
        return $response->withJson(array('error' => $ex->getMessage()),422);
    }

}




/*function addSubject($request, $response) {
           
    $sql = "INSERT INTO subjects VALUES (:sub_id, :sub_name, :sub_credit, :sub_hour)";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':sub_id' => $request->getParam('id'),
            ':sub_name' => $request->getParam('name'),
            ':sub_credit' => $request->getParam('credit'),
            ':sub_hour' => $request->getParam('hour')
        );
        $result = $stmt->execute($values);
        return $response->withJson(array('status' => 'Subject Created'),200);
        $db=null;
        }
        catch(\PDOException $ex){
                return $response->withJson(array('error' => $ex->getMessage()),422);
        }
}
 
function updateSubject($request, $response) {

    $sub_id = $request->getAttribute('id');
    $sql = "UPDATE subjects SET sub_name=:sub_name, sub_credit=:sub_credit, sub_hour=:sub_hour WHERE sub_id=:sub_id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':sub_name' => $request->getParam('name'),
            ':sub_credit' => $request->getParam('credit'),
            ':sub_hour' => $request->getParam('hour'),
            ':sub_id' => $sub_id
        );
        $result = $stmt->execute($values);
        if($result){
            return $response->withJson(array('status' => 'Subject Updated'),200);
        }else{
            return $response->withJson(array('status' => 'Subject Not Found'),422);
        }
        $db=null;
        }
        catch(\PDOException $ex){
                return $response->withJson(array('error' => $ex->getMessage()),422);
        }
}
 
function deleteSubject($request, $response) {

    $sub_id = $request->getAttribute('id');
    $sql = "DELETE FROM subjects WHERE sub_id=:sub_id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':sub_id' => $sub_id
        );
        $result = $stmt->execute($values);
        if($result){
            return $response->withJson(array('status' => 'Subject Deleted'),200);
        }else{
            return $response->withJson(array('status' => 'Subject Not Found'),422);
        }
        $db=null;
        }
        catch(\PDOException $ex){
                return $response->withJson(array('error' => $ex->getMessage()),422);
        }
}


