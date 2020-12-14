<?php

require_once 'queryICBF.php';

class IcbfFunctions
{
    public $uid;

    public function queryIcbf()
    {

        $resp = new QueryIcbf();
        $ret = $resp->getStudent($this->uid);
        $response = "";
        if (!empty($ret)) {
            date_default_timezone_set('America/Bogota');
            setlocale(LC_TIME, "es_CO.UTF-8");
            $date = strftime("%A %d de %B de %Y - %I:%M %p");
            $response = '
            <div class="row">
                <div class="col-sm-12">
                    <p><b>Respuesta a consulta</b></p>
                    <p><b>Fecha de consulta:</b> ' . $date . '</p>
                    <p><b>Número de documento: </b> ' . $ret["numeroDocumentoBeneficiario"] . '</p>
                    <p><b>Nombre:</b> ' . $ret["primerNombreBeneficiario"] . ' ' . $ret["segundoNombreBeneficiario"] . '</p>
                    <p><b>Apellido:</b> ' . $ret["primerApellidoBeneficiario"] . ' ' . $ret["segundoApellidoBeneficiario"] . '</p>
                    <p><b>Proveniente:</b> ' . $ret["unidadServicio"] . '</p>
                    <p><b>IEO Asignada:</b> ' . $ret["ieoAsignada"] . '</p>
                </div>
            </div>
            
            
            ';
        } else {
            date_default_timezone_set('America/Bogota');
            setlocale(LC_TIME, "es_CO.UTF-8");
            $date = strftime("%A %d de %B de %Y");
            $response = '
             <div class="row">
                <div class="col-sm-12">
                    <p><b>Respuesta a consulta</b></p>
                    <p><b>Fecha de consulta:</b> ' . $date . '</p>
                    <p><b>Respuesta: </b>No existe una asignación con el número de documento ingresado. Verifique la información e intente nuevamente.</p>';
        }
        echo $response;
    }
}

if (isset($_POST['uid'])) {
    echo $_POST['uid'];
}
