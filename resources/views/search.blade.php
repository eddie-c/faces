<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
//        function useit(bt){
//            //copy to clickboard
//            var img = bt.parentNode.firstChild.firstChild;
//            var div = bt.parentNode.firstChild;
//            img.contentEditable = 'true';
//            var controlRange;
////            if (typeof img.contentEditable == 'undefined' || !document.body.createControlRange){
////
////                alert('您的浏览器不支持直接复制图片，请在图片上点击右键“复制图片”');
////
////            }
////            if(typeof div.contentEditable =='undefined' || !document.body.createControlRange) {
////
////                alert('您的浏览器不支持直接复制图片，请在图片上点击右键“复制图片”');
////            }
//			document.select(img);
//			document.execCommand("copy");
////            if (document.body.createControlRange) {
////                controlRange = document.body.createControlRange();
////                controlRange.addElement(img);
////                controlRange.execCommand('Copy');
////            }
////            img.contentEditable = 'false';
////            div.contentEditable = 'false';
//        }
	</script>
	<script>
		var waiting = 0;
		var flag = false;
        var datas2;
        var datas1;
        function addImgs(datas1,datas2){

            addFavoriteList(datas2);

        }


	</script>
	<script>

        function addSearchList(datas){

			var parent = document.getElementsByName("searchresult")[0];

			var children = parent.getElementsByClassName("pic");

			for(var i=children.length-1;i>=0;i--){
			    parent.removeChild(children[i]);
			}
//
            for(var i in datas){

                var outdiv = document.getElementsByName("searchresult")[0];

                var picdiv = document.createElement("div");
                picdiv.className = "pic clearfix";

                var imgdiv = document.createElement("div");
                imgdiv.className = "img";
                var	domain = window.document.domain

                var imgurl = "/imgs/"+datas[i].img_name;

                var img = document.createElement("img");

                    img.src = imgurl;

                imgdiv.append(img);
                var bt1 = document.createElement("button");
                bt1.innerHTML="不喜欢";

                bt1.className = "nolike fl";
                var bt2 = document.createElement("button");

                picdiv.append(imgdiv);
                picdiv.append(bt1);

                outdiv.append(picdiv);
            }
        }

        function search(){
			var s = document.getElementsByClassName("search_text")[0];
			var text = s.value
//			alert(text);
            $.ajax({
                type: "POST",   //访问WebService使用Post方式请求
                contentType: "application/json",
                url: "/searchresult/?searchtext="+text, //调用WebService的地址和方法名称组合 ---- WsURL/方法名
                data: {},  //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到
                dataType: 'json',   //WebService 会返回Json类型

                success: function(result) {     //回调函数，result，返回
                    //                        alert(result);
                    datas = result;

					addSearchList(datas);
                }
			});
		}
	</script>
	<script>
        $(document).ready(function() {
        	search();
        });
	</script>
</head>

<body>
	<div class="main">
		<div class="search_box clearfix">
			<input type="text" class="search_text fl" name="search_text" value={{$searchtext}}>
			<input type="submit" class="search_btn fr" value="搜索" onclick="search()">
		</div><!-- search 结束 -->
		<div class="main_left fl">
			<h2 class="cartoon">搜索结果</h2>
			<div class="list clearfix" id="searchresult" name="searchresult" >
			</div>
		</div>
	</div><!-- main 结束 -->
</body>
<script>

</script>
</html>