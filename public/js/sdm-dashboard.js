const ctx = document.getElementById('statusChart');

if(ctx){

new Chart(ctx,{

type:'doughnut',

data:{

labels:[

'Menunggu',

'Review',

'Diterima',

'Ditolak'

],

datasets:[{

data:[28,17,43,12],

backgroundColor:[

'#FFA500',

'#3498DB',

'#2ECC71',

'#E74C3C'

]

}]

},

options:{

plugins:{

legend:{

position:'bottom'

}

}

}

});

}

const input=document.getElementById("searchInput");

if(input){

input.addEventListener("keyup",function(){

let filter=this.value.toLowerCase();

let rows=document.querySelectorAll("#pengajuanTable tbody tr");

rows.forEach(row=>{

row.style.display=row.innerText.toLowerCase().includes(filter)

? ""

: "none";

});

});

}