<?php
/**
 * @CompanyURI: https://lumusoft.com
 * @Description: Developed by LUMUSOFT Software team.
 * @Version: 1.0.0
 * @Date :    09.08.2021
 */


function poststatus($status){

    if ($status==1){
        return  'Anbar  tərəfindən təsdiq gözləyir';
    }elseif ($status==2){
        return  'Rəis  tərəfindən təsdiq gözləyir';
    } elseif ($status==3){
        return  'Admin  tərəfindən təsdiq gözləyir';
    } elseif ($status==4){
        return  'Təchizatçı  tərəfindən təsdiq gözləyir';
    } else{
        return  'Nəzarətçi  tərəfindən təsdiq gözləyir';

    }

}
