<?php

function retlat_geo($geo) {

    $geo_lista = [
        ["geoname" => "GEO_AL", "nombre" => 'América Latina', "familia" => "052e230009"],
        ["geoname" => "GEO_SC", "nombre" => 'Colombia', "familia" => "7ce061589d"],
        ["geoname" => "GEO_ALL", "nombre" => 'Todo el mundo', "familia" => "2db9a429f7"],
        ["geoname" => "GEO_ALLNOCOL", "nombre" => 'Todo el mundo NO COL', "familia" => "7898437ab4"],
        ["geoname" => "GEO_ALLNOCOLNOUSA", "nombre" => 'Todo el mundo NO COL, NO EEUU', "familia" => "1a17651352"],
        ["geoname" => "GEO_SINNORTEAMERICA", "nombre" => 'No disponible en México, Canadá y Estados Unidos', "familia" => "a39cde60dc"],
        ["geoname" => "GEO_AL_SINMEXICO", "nombre" => 'América Latina excepto México', "familia" => "cc9c40e602"],
        /*["geoname" => "GEO_AL_SINCHILE", "nombre" => 'América Latina excepto Chile', "familia" => "59fd2b4568"],*/
        ["geoname" => "GEO_AL_SINCHILE", "nombre" => 'América Latina excepto Chile', "familia" => "ce22698f7f"],
        ["geoname" => "GEO_AL_NOMEX_NOARG", "nombre" => 'América Latina No disponible en México / Argentina', "familia" => "655c7f2956"],
        ["geoname" => "GEO_SP", "nombre" => 'Perú', "familia" => "272b9fffd4"],
        ["geoname" => "GEO_AL_NOARG_NOCHI_NOURU", "nombre" => 'América Latina No disponible en Argentina / Chile / Uruguay', "familia" => "b8436605f8"],
        ["geoname" => "GEO_SB", "nombre" => 'Bolivia', "familia" => "a79ef0fd36"],
        ["geoname" => "GEO_AL_NOECU_NOMEX_NOPER", "nombre" => 'América Latina No disponible en Ecuador / México / Perú', "familia" => "221536146d"],
        ["geoname" => "GEO_AL_NOARG_NOCHI_NOMEX_NOPER", "nombre" => 'América Latina No disponible en Argentina / Chile / México / Perú', "familia" => "0360a94e15"],
        ["geoname" => "GEO_AL_SINBRASIL", "nombre" => 'América Latina No disponible en Brasil', "familia" => "b58f0ed7d1"],
        ["geoname" => "GEO_AL_SINCOLOMBIANIBRASIL", "nombre" => 'América Latina No disponible en Colombia / Brasil', "familia" => "d49bb96679"],
        ["geoname" => "GEO_AL_SINCUBASINPUERTORICO", "nombre" => 'América Latina No disponible en Cuba / Puerto Rico', "familia" => "9c36f59ae4"],
        ["geoname" => "GEO_AL_ESPECIALPERU", "nombre" => 'AR, BO, BR, CL, CO, CR, CU, EC, SA, GU, HA, HO, MX, NC, PAR, PE, RDO, UY', "familia" => "1cd7f25045"],
        ["geoname" => "GEO_AL_SIN_ARGENTINA", "nombre" => 'América Latina No disponible en Argentina', "familia" => "93d8bd9ca9"],
        ["geoname" => "GEO_MUNDO_NOESP_AND_CHILE", "nombre" => 'Todo el mundo No disponible en España, Andorra y Chile', "familia" => "c4570d8457"],
        ["geoname" => "GEO_MUNDO_NOESP_ANDORRA", "nombre" => 'Todo el mundo No disponible en España y Andorra', "familia" => "13795eec3c"],
        ["geoname" => "GEO_AL_SINPERU", "nombre" => 'América Latina excepto Perú', "familia" => "9db88c3335"],
        ["geoname" => "GEO_AL_SINVZLA", "nombre" => 'América Latina excepto Venezuela', "familia" => "26f7e1de66"],
        ["geoname" => "GEO_AL_SINPUERTORICO", "nombre" => 'América Latina excepto Puerto Rico', "familia" => "6da95600a1"],
        ["geoname" => "GEO_BOL_ECU_PER", "nombre" => 'Bolivia, Ecuador y Perú', "familia" => "c52ed1c036"],


    ];

    return array_values(array_filter($geo_lista, function ($res) use ($geo) {
        $resultado = $res['geoname'] === $geo;
        return $resultado;
    }));
}
