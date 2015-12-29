<?php
    include 'general scraper.php';
    $building = 'Sing Tao';
    if ($building == 'Totem') {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=831317ed-1695-4a28-a197-9d9bad7e727e&dgm=x-pml:/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_totem%20park.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Sing Tao") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=f6b9062f-2973-485f-a21f-ae3f4c411a89&dgm=x-pml:/diagrams/ud/UBC_SUS/sub_diagrams/Sing_tao_212-device_template_elec.dgm&node=Buildings.Sing_tao_212&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Pharmacy S2") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=34ad29eb-52b2-4981-ac81-4693b8a8ce31&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Pharmacy MDCB") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=3c10ff10-dffd-4f50-b313-43f089e2ac68&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Pharmacy MDCA") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=95e0f6a0-ea87-4f10-8c37-afc3ecd5e9b7&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Pharmacy LV-PB") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=11eb15e6-509d-4b69-b2e1-4eb0fdfb1911&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Pharmacy LV-PA") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=1c2753d0-bc6e-40fc-8655-480e302f84a2&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Pharmacy LV-DCB") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=809a43cc-8089-4216-992b-92324c079530&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Pharmacy LV-DCA") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=3084925c-14fc-4fe6-a999-a44679794193&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Pharmacy E1") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=bfb2a163-f218-400b-b8d2-6177e6d949be&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Neville Scarfe") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=f6b9062f-2973-485f-a21f-ae3f4c411a89&dgm=x-pml:/diagrams/ud/UBC_SUS/sub_diagrams/Scarfe_232-device_template_elec.dgm&node=Buildings.Scarfe_232&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Life Science") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=57bc3363-95f1-45aa-8fef-fefb8ad8791b&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/Life_Sciences_Tot.dgm&node=&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Kenny") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=f6b9062f-2973-485f-a21f-ae3f4c411a89&dgm=x-pml:/diagrams/ud/UBC_SUS/sub_diagrams/Kenny_732-device_template_elec.dgm&node=Buildings.Kenny_732&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Kaiser") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=f6b9062f-2973-485f-a21f-ae3f4c411a89&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/Kaiser_313-device_template_elec.dgm&node=Buildings.Kaiser_313&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "CIRS") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=f6b9062f-2973-485f-a21f-ae3f4c411a89&dgm=x-pml:/diagrams/ud/UBC_SUS/sub_diagrams/CIRS_633-device_template_elec.dgm&node=Buildings.CIRS_633&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Brock Hall") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=f6b9062f-2973-485f-a21f-ae3f4c411a89&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/Brock_Hall_112-device_template_elec.dgm&node=Buildings.Brock_Hall_112&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    elseif ($building == "Allard Hall") {
    	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=f6b9062f-2973-485f-a21f-ae3f4c411a89&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/Allard_482-device_template_elec.dgm&node=Buildings.Allard_482&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
    }
    scrapper($url)
?>