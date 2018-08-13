function disp_prompt(user)

{
	var name=prompt("请输入您的用户名",""); // 弹出input框
	if(name!=""){
		user.value=name;
		alert("修改成功");
	}else
	alert("不能为空！");
}
function disp_prompt1(sex)
{
	if(parseInt(sex)!=1){
		sex.style.display="none";
		document.getElementById("xysex").style.display="block";
	}
	if(parseInt(sex)==1){
		isAutoSend=document.getElementsByName("sex");
		for (var i = 0; i < isAutoSend.length; i++) {
            if (isAutoSend[i].checked == true) {
               document.getElementById("nosex").value=isAutoSend[i].value;
            }
		}
			document.getElementById("nosex").style.display="block";
			document.getElementById("xysex").style.display="none";
	}
}
function menus(ok){
	switch(parseInt(ok)){
	
	case 3:	
		document.getElementById("book_say").style.display="none";
		document.getElementById("book_get").style.display="none";
		document.getElementById("thinks").style.display="block";
		document.getElementById("single_people").style.display="none";
		document.getElementById("change_pass").style.display="none";
		break;
	case 4:	
		document.getElementById("book_say").style.display="none";
		document.getElementById("book_get").style.display="none";
		document.getElementById("thinks").style.display="none";
		document.getElementById("single_people").style.display="block";
		document.getElementById("change_pass").style.display="none";
		break;
	case 5:	
		document.getElementById("book_say").style.display="none";
		document.getElementById("book_get").style.display="none";
		document.getElementById("thinks").style.display="none";
		document.getElementById("single_people").style.display="none";
		document.getElementById("change_pass").style.display="block";
		break;
	}
}