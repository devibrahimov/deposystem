<?php
/**
 * @CompanyURI: https://lumusoft.com
 * @Description: Developed by LUMUSOFT Software team.
 * @Version: 1.0.0
 * @Date :    09.08.2021
 */


function poststatus($status){

    if($status==0){
        return  'Nəzarətçi  tərəfindən təsdiq gözləyir';
    }elseif ($status==1){
        return  'Anbar  tərəfindən təsdiq gözləyir';
    }elseif ($status==2){
        return  'Rəis  tərəfindən təsdiq gözləyir';
    } elseif ($status==3){
        return  'Admin  tərəfindən təsdiq gözləyir';
    } elseif ($status==4){
        return  'Təchizatçı  tərəfindən təsdiq gözləyir';
    }
    elseif ($status==-1){
        return  'Nəzarətçi tərəfindən ləğv edildi';
    }elseif ($status==-2){
        return  'Anbar  tərəfindən ləğv edildi';
    } elseif ($status==-3){
        return  'Rəis  tərəfindən ləğv edildi';
    } elseif ($status==-4){
        return  'Admin  tərəfindən ləğv edildi';
    } elseif ($status==-5){
        return  'Təchizatçı  tərəfindən ləğv edildi';
    } elseif ($status==10){
        return  'Anbar tərəfindən təhvil verildi';
    } elseif ($status==11){
        return  'Təchizatçı  tərəfindən temin edildi';
    }  else{
        return  'Bilinməz';
    }

}
