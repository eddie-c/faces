<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script>

		function getImgInfo(imgid){
			$.ajax({
                    type: "post",   //访问WebService使用Post方式请求
                    contentType: "application/json",
                    url: "/getImgById?imgid="+imgid, //调用WebService的地址和方法名称组合 ---- WsURL/方法名
                    data: "",  //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到
                    dataType: "json",   //WebService 会返回Json类型
                    success: function (result) {     //回调函数，result，返回值
						console.log("getImginfo finished");
                    }
			});
		}

        function addToFavorite(bt){
            alert(bt.parentNode);
            var img = bt.parentNode.firstChild.firstChild;
            var imgname = img.getAttribute("imgname");
            var imgid = img.getAttribute("imgid");

            $.ajax({
                type: "POST",   //访问WebService使用Post方式请求
                contentType: "application/json",
                url: "/addToFavorite?imgid="+imgid, //调用WebService的地址和方法名称组合 ---- WsURL/方法名
                data: "{}",  //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到
                dataType: "json",   //WebService 会返回Json类型
                success: function(result) {
                    var data = getImgInfo(imgid);
                    addToList(data, "favorite");
                }
            });
        }

        function addToList(datas,sectiontype){
            for(var i in datas){
//                var outdiv = document.getElementById("recent");
                var outdiv = document.getElementsByName(sectiontype)[0];

                var picdiv = document.createElement("div");
                picdiv.className = "pic clearfix";

                var imgdiv = document.createElement("div");
                imgdiv.className = "img";
                var	domain = window.document.domain
//				alert(domain);
                var imgurl = "/imgs/"+datas[i].img_name;

                var img = document.createElement("img");

				{{--img.src = "{{URL::asset(\"imgurl\")}}";--}}
                    img.src = imgurl;
                img.setAttribute("imgname",datas[i].img_name);
                img.setAttribute("imgid",datas[i].img_id);
//				console.log("xxxxx"+serverurl);
                imgdiv.append(img);
                var bt1 = document.createElement("button");
                bt1.innerHTML="不喜欢";
                bt1.className = "nolike fl";
//                bt1.onclick =
                var bt2 = document.createElement("button");
                bt2.innerHTML = "收藏";
                bt2.className = "like fr";
				bt2.onclick = function(){
                    addToFavorite(this);
				}
                picdiv.append(imgdiv);
                picdiv.append(bt1);

                if(!(sectiontype=="favorite")) {
//                    alert(sectiontype);
                    picdiv.append(bt2);
                }
//                picdiv.append(bt2);
                outdiv.append(picdiv);
            }
        }

	</script>
	<script>
		var waiting = 0;
		var flag = false;
        var datas1;
        var datas2;
        var datas3;
        function addImgs(datas1,datas2,datas3){

            addToList(datas1,"recent");
            addToList(datas2,"favorite");
            addToList(datas3,"mostpopular");
        }

        waiting == 3 && !flag && addImgs(datas1,datas2,datas3) && (flag = true);

	</script>
	<script>

		function dislike(bt){
            var img = bt.parentNode.firstChild.firstChild;
            var imgname = img.getAttribute("imgname");
            alert(imgname);

            $.ajax({
                type: "POST",   //访问WebService使用Post方式请求
                contentType: "application/json",
                url: "/getRecentImgList", //调用WebService的地址和方法名称组合 ---- WsURL/方法名
                data: "{}",  //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到
                dataType: 'json',   //WebService 会返回Json类型

                success: function(result) {     //回调函数，result，返回值
                    console.log('ajax1')
                    //                        alert(result);
                    datas1 = result;
                    waiting++;
                    waiting == 3 && !flag && addImgs(datas1,datas2,datas3) && (flag = true);
                }
            });
		}



        function search(bt){
			var s = document.getElementsByClassName("search_text")[0];
			var text = s.value
			window.location = "/search?searchtext="+text;
		}
	</script>

	<script>

        $(document).ready(function() {
                $.ajax({
                    type: "POST",   //访问WebService使用Post方式请求
                    contentType: "application/json",
                    url: "/getRecentImgList", //调用WebService的地址和方法名称组合 ---- WsURL/方法名
                    data: "{}",  //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到
                    dataType: 'json',   //WebService 会返回Json类型

                    success: function(result) {     //回调函数，result，返回值
						console.log('ajax1')
						//                        alert(result);
                        datas1 = result;
                        waiting++;
                        waiting == 3 && !flag && addImgs(datas1,datas2,datas3) && (flag = true);
                    }
                });
        });
//		alert("datas:"+datas);

	</script>

	<script>

        $(document).ready(function() {
            $.ajax({
                type: "POST",   //访问WebService使用Post方式请求
                contentType: "application/json",
                url: "/getMostPopularImgList", //调用WebService的地址和方法名称组合 ---- WsURL/方法名
                data: "{}",  //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到
                dataType: 'json',   //WebService 会返回Json类型

                success: function(result) {     //回调函数，result，返回值
                    console.log('ajax1')
                    //                        alert(result);
                    datas3 = result;
                    waiting++;
                    waiting == 3 && !flag && addImgs(datas1,datas2,datas3) && (flag = true);
                }
            });
        });
        //		alert("datas:"+datas);

	</script>

	<script>

        $(document).ready(function() {
            $.ajax({
                type: "POST",   //访问WebService使用Post方式请求
                contentType: "application/json",
                url: "/getFavoriteImgList", //调用WebService的地址和方法名称组合 ---- WsURL/方法名
                data: "{}",  //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到
                dataType: 'json',   //WebService 会返回Json类型

                success: function(result) {     //回调函数，result，返回值
                    console.log('ajax2')
//                        alert(result);
                    datas2 = result;
                    waiting++;
                    waiting == 3 && !flag && addImgs(datas1,datas2,datas3) && (flag = true);
                }
            });
        });
        //		alert("datas:"+datas);

	</script>

</head>

<body>
	<div class="main">
		<div class="search_box clearfix">
			<input type="text" class="search_text fl" name="search_text">
			<input type="submit" class="search_btn fr" value="搜索" onclick="search(this)">
		</div><!-- search 结束 -->

		<div class="main_left fl">
			<h2 class="cartoon">最热图片</h2>
			<div class="list clearfix" id="mostpopular" name="mostpopular">

			</div>
		</div><!-- main_left 结束 -->

		<div class="main_left fl">
			<h2 class="cartoon">最近使用</h2>
			<div class="list clearfix" id="recent" name="recent">

			</div>
		</div><!-- main_left 结束 -->
		<div class="main_left fl">
			<h2 class="cartoon">收藏的图片</h2>
			<div class="list clearfix" id="favorite" name="favorite">

			</div>
		</div><!-- main_left 结束 -->
	</div><!-- main 结束 -->
</body>
<script>
//	getImglist();
//    addRecentImgs(datas1,datas2);
</script>
</html>