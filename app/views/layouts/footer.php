<script>

new Chart(document.getElementById("nivelChart"),{

type:"bar",

data:{

labels:[

<?php

foreach($nivel as $n){

echo "'".$n["clasificacion"]."',";

}

?>

],

datasets:[{

label:"Riesgos",

data:[

<?php

foreach($nivel as $n){

echo $n["total"].",";

}

?>

]

}]

}

});

new Chart(document.getElementById("activoChart"),{

type:"pie",

data:{

labels:[

<?php

foreach($activo as $a){

echo "'".$a["nombre"]."',";

}

?>

],

datasets:[{

data:[

<?php

foreach($activo as $a){

echo $a["total"].",";

}

?>

]

}]

}

});

</script>