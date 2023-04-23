<script>
	 var i=0;
	 function progressBar()
	 {
		if(i==0)
		{
			i=1;
			var elm=document.getElementById('bar');
			var width=1;
			var id=setInterval(frame,10);
			
			function frame()
			{
				
				
				if(width>=100)
				{
					clearInterval(id);
					//elm.innerHTML='Upload Completed';
				}
				else
				{
					width++;
					elm.style.width=width+"%";
					//elm.innerHTML=width+"%";
				}
			}
		}
	 }
	 </script>
<script src="<?= @$admin_url;?>js/custom-mini-js.js"></script>  
  