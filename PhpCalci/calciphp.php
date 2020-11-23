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
				<td class="calci-td"><input type="button" class="btn-oprt" value = "="></td>
            </tr>
            <tr>
                <td class="calci-td" colspan="5"><div class="cal-footer"><b>Developed by @Cedcoss<b></div></td>
            </tr> 
		</table>
	</section>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var temp=0;
            var operand=0;
            var operatore;
            var flag = 0;
            $('.btn-data').click(function(e){
                e.preventDefault();
                var btn_val = $(this).val();
                operand = Number(operand)*10 + Number(btn_val);
                $('#input').val(operand);                            
            });
            $('.btn-oprt').click(function(e){               
                e.preventDefault();
                if(flag==0) {
                    operatore = $(this).val();
                    temp = $('#input').val();
                    flag++;
                    $('#input').val('');
                    operand = 0;
                } else {
                    value = $('#input').val();
                    $.ajax({
                    url:'calculation.php',
                    type:"POST",
                    data: {val_1:temp, oprt:operatore, val_2:value},
                    success : function(data) {
                        temp = data;
                        $('#input').val(data);
                        value = 0;                     
                        operand = 0;
                    }
                });
                }
                operatore = $(this).val();               
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
</html>