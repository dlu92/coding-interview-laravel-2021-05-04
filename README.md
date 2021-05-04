<div>
<h1 style="text-align: center;"><strong>Examen&nbsp;JC&nbsp;Management</strong></h1>
<p>&nbsp;</p>
</div>
<ul>
<li>
<h2><strong>Ejercicio&nbsp;1:</strong></h2>
</li>
</ul>
<p>&nbsp;</p>
<div><strong>Enunciado:</strong>&nbsp;Obtener&nbsp;el&nbsp;n&uacute;mero&nbsp;de&nbsp;veces&nbsp;que&nbsp;se&nbsp;repite&nbsp;cada&nbsp;palabra&nbsp;en&nbsp;la&nbsp;oraci&oacute;n.</div>
<p>&nbsp;</p>
<div>String:&nbsp;Lorem&nbsp;Ipsum&nbsp;is&nbsp;simply&nbsp;dummy&nbsp;text&nbsp;of&nbsp;the&nbsp;printing&nbsp;and&nbsp;typesetting&nbsp;industry.&nbsp;Lorem</div>
<div>Ipsum&nbsp;has&nbsp;been&nbsp;the&nbsp;industry's&nbsp;standard&nbsp;dummy&nbsp;text&nbsp;ever&nbsp;since&nbsp;the&nbsp;1500s,&nbsp;when&nbsp;an</div>
<div>unknown&nbsp;printer&nbsp;took&nbsp;a&nbsp;galley&nbsp;of&nbsp;type&nbsp;and&nbsp;scrambled&nbsp;it&nbsp;to&nbsp;make&nbsp;a&nbsp;type&nbsp;specimen&nbsp;book.&nbsp;It</div>
<div>has&nbsp;survived&nbsp;not&nbsp;only&nbsp;five&nbsp;centuries,&nbsp;but&nbsp;also&nbsp;the&nbsp;leap&nbsp;into&nbsp;electronic&nbsp;typesetting,&nbsp;remaining</div>
<div>essentially&nbsp;unchanged.&nbsp;It&nbsp;was&nbsp;popularised&nbsp;in&nbsp;the&nbsp;1960s&nbsp;with&nbsp;the&nbsp;release&nbsp;of&nbsp;Letraset&nbsp;sheets</div>
<div>containing&nbsp;Lorem&nbsp;Ipsum&nbsp;passages,&nbsp;and&nbsp;more&nbsp;recently&nbsp;with&nbsp;desktop&nbsp;publishing&nbsp;software&nbsp;like</div>
<div>Aldus&nbsp;PageMaker&nbsp;including&nbsp;versions&nbsp;of&nbsp;Lorem&nbsp;Ipsum.</div>
<p>&nbsp;</p>
<div>INPUT:&nbsp;String&nbsp;con&nbsp;un&nbsp;texto</div>
<div>OUPUT:&nbsp;N&uacute;mero&nbsp;de&nbsp;apariciones&nbsp;de&nbsp;cada&nbsp;palabra</div>
<p>&nbsp;</p>
<ul>
<li>
<h2><strong>Ejercicio&nbsp;2</strong></h2>
</li>
</ul>
<p>&nbsp;</p>
<div><strong>Enunciado:</strong>&nbsp;Dado&nbsp;un&nbsp;string&nbsp;formado&nbsp;por&nbsp;(),&nbsp;[],&nbsp;{}&nbsp;escribe&nbsp;un&nbsp;programa&nbsp;que&nbsp;indique&nbsp;si&nbsp;los</div>
<div>pares&nbsp;correspondientes&nbsp;son&nbsp;correctos.</div>
<p>&nbsp;</p>
<div>Ejemplo:</div>
<div>Entrada:&nbsp;()[]([])&nbsp;CORRECTO</div>
<div>Entrada:&nbsp;[][&nbsp;INCORRECTO</div>
<p>&nbsp;</p>
<div>INPUT&nbsp;(caracteres&nbsp;variables)</div>
<div>TEST1:&nbsp;(())</div>
<div>TEST&nbsp;2:&nbsp;([]{})[(){}]</div>
<div>TEST&nbsp;3&nbsp;[]{})</div>
<p>&nbsp;</p>
<div>OUPUT:</div>
<div>TEST1:&nbsp;true</div>
<div>TEST&nbsp;2:&nbsp;true</div>
<div>TEST&nbsp;3&nbsp;false</div>
<div>&nbsp;</div>
<h2 style="text-align: center;"><strong>Descripci&oacute;n</strong></h2>
<p>El examen se ha realizado sobre el framework de Laravel y plataformado sobre Docker, para la interfaz gr&aacute;fica se a utilizado blade y se ha programado el html, css y javascript nativo, el proyecto incluye reconocimiento de idioma autom&aacute;tico de ingl&eacute;s y espa&ntilde;ol, siendo ingles el idioma por defecto en caso de lenguajes extranjeros. Por &uacute;ltimo, se incluyen test unitarios para el an&aacute;lisis autom&aacute;tico de los m&eacute;todos desarrollados.</p>
<h2 style="text-align: center;"><strong>Documentaci&oacute;n</strong></h2>
<p>En el proyecto se incluye un "docker-compose.yml" con el que poder plataformarlo, as&iacute; como un .env.example que usar como base para las configuraciones necesarias.</p>
<p><br />Deberemos ejecutar nuestro docker con el comando "docker-compose up", una vez finalice el proceso de instalaci&oacute;n accederemos al contenedor de nuestra aplicaci&oacute;n a trav&eacute;s del comando "docker exec -it jc_management.app bash" y acto seguido ejecutaremos el comando "composer install" para descarga los repositorios necesarios de Laravel. Ademas tambi&eacute;n deberemos ejecutar las migraciones de base de datos con el comando "php artisan migrate".</p>
<p><br />Una vez hayan finalizado todos los procesos, la plataforma estar&aacute; disponible a trav&eacute;s de una interfaz gr&aacute;fica accesible desde la url http://localhost:8383 donde nos mostrara un men&uacute; que nos dar&aacute; paso a los dos ejercicios resueltos.</p>
<p><br />Tambi&eacute;n contamos con los correspondientes test unitarios que podremos ejecutar desde la consola del contenedor con el comando "./vendor/bin/phpunit".</p>