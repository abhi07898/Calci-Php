<!DOCTYPE html>
<html>
<head>
	<title>Calci Through PHp</title>
	<link rel="stylesheet" type="text/css" href="calci-php.css">
	<!-- <script type="text/javascript" src="calci-updated.js"></script> -->
</head>
<body>
	<header>
	</header>
	<section id="table-sec"> 
		<table>
            <tr>
                <td class="calci-td" colspan="5"><div class="cal-head"><b>Ced-Calci<b></div></td>
            </tr>       
			<tr>
				<td class="calci-td" colspan="5"><input type="text" name="" id="input" placeholder="START YOUR JOURNEY"></td>
			</tr>
			<tr>
				<td class="calci-td"><input type="button" class="btn-data" value = "1"></td>
				<td class="calci-td"><input type="button" class="btn-data" value = "2"></td>
				<td class="calci-td"><input type="button" class="btn-data" value = "3"></td>
				<td class="calci-td"><input type="button" class="btn-oprt" value = "+"></td>
			</tr>
			<tr>
				<td class="calci-td"><input type="button" class="btn-data" value = "4"></td>
				<td class="calci-td"><input type="button" class="btn-data" value = "5"></td>
				<td class="calci-td"><input type="button" class="btn-data" value = "6"></td>
				<td class="calci-td"><input type="button" class="btn-oprt" value = "-"></td>
			</tr>
			<tr>
				<td class="calci-td"><input type="button" class="btn-data" value = "7"></td>
				<td class="calci-td"><input type="button" class="btn-data" value = "8"></td>
				<td class="calci-td"><input type="button" class="btn-data" value = "9"></td>
				<td class="calci-td"><input type="button" class="btn-oprt" value = "*"></td>
			</tr>
			<tr>
				<td class="calci-td"><input type="button" class="btn-data" value = "0"></td>
				<td class="calci-td"><input type="button" class="btn-oprt" value = "/"></td>
				<td class="calci-td"><input type="button" class="btn-data" value = "c"></td>
				<td class="calci-td"><input type="button" class="btn-oprt" value = "%"></td>
            </tr>
            <tr>
                <td class="calci-td" colspan="5"><div class="cal-footer"><b>Developed by @Cedcoss<b></div></td>
            </tr> 
		</table>
	</section>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        <script>
        $(document).ready(function(){
            var temp=0;
            var operand;
            var operatore='';
            var result=0;
            var result=0; 
            $('.btn-data').click(function(e){
                e.preventDefault();
                var btn_val = $(this).val();
                temp = Number(temp)*10 + Number(btn_val);
                document.getElementById('input').value = temp;                               
            });
            $('.btn-oprt').click(function(e){               
                e.preventDefault();
                operand = document.getElementById('input').value;
                var btn_oprt = $(this).val(); 
                document.getElementById('input').value= btn_oprt;              
                operatore = document.getElementById('input').value;  
                $.ajax({
                    url:'calculation.php',
                    type:"POST",
                    data: {val:operand, oprt:operatore, prev_result:result},
                    success : function(data) {
                        $('#input').val(data);
                        result = data;                      
                        temp = 0;
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
</html>