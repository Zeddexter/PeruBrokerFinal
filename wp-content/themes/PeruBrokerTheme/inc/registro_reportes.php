<?php
function registrarReportes(){
 //add_menu_page('PeruBroker','Reportes','administrator','rp_estadisticas','rp_estadisticas','',20);
//add_submenu_page('rp_estadisticas','Estadisticas','Estadisticas','administrator','rp_estadisticas','rp_estadisticas');
add_submenu_page('perubroker_reportes','Nuevo Reporte','Fishing Report','administrator','rp_nuevos_reportes','rp_nuevos_reportes');
//add_submenu_page('rp_estadisticas','Reportes','Reportes','administrator','rp_reportes','rp_reportes');
}

add_action('admin_menu','registrarReportes');

function rp_estadisticas (){
echo "Hola, aqui estaran los reportes nuevos";
}
