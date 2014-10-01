

# 第22、23课 图片懒加载
### 课程内容
####1. 什么是图片懒加载、应用场景
当页面被请求时，只加载可视区域的图片，其它部分的图片则不加载，只有这些图片出现在可视区域时才会动态加载这些图片，从而节约了网络带宽和提高了初次加载的速度.

####2. 实现方式
- 在页面中准备一个id为div1的div,在这个div中放一个ul,ul中准备了一些li,然而这些li都有一个data-src的属性，准备着图片的地址

		<div id="div1">
        	<ul>
				<li data-src="http://t03.pic.sogou.com/7620cd6e740c3c50.jpg"></li>
				<li data-src="http://t03.pic.sogou.com/2c67d8e270eb61c3.jpg"></li>	
				<li data-src="http://t01.pic.sogou.com/9c9d058c0c731087.jpg"></li>
		</ul>
		</div>



- 图片的动态加载就是通过读取li元素，然后获得li元素的data-src属性的值赋予动态创建的图片的src，从而实现了图片的创建。

		function setImg(index) {
        	var c = document.getElementById('div1');
        	var ul = c.children[0];
        	var lis = ul.children;

        	var src = lis[index].getAttribute('data-src');
        	var newImg = document.createElement('img');
        	newImg.src = src;
        	if (lis[index].children.length == 0) {
            	lis[index].appendChild(newImg);
        	}
    	}

- 识别可视区域，能够实现获得当前元素距离网页顶部的距离

        //获得对象距离页面顶端的距离
        function getH(obj) {
            var h = 0;
            while (obj) {
                h += obj.offsetTop;
                obj = obj.offsetParent;
            }
            return h;
        }
- 当页面滚动时判断位置，设置图片

		window.onscroll = function () {
            var div = document.getElementById('div1'),
                ul = div.children[0],
                lis = ul.children;

            for (var i = 0, l = lis.length; i < l; i++) {
                var li = lis[i];
                //检查oLi是否在可视区域
                var t = document.documentElement.clientHeight + 
                	(document.documentElement.scrollTop || document.body.scrollTop);
                var h = getH(li);
                if (h < t) {
                    setTimeout(function(){
                        setImg(i);
                    }, 1000);
                }
            }
        };

- 启动

        window.onload = function () {
            window.onscroll();
        };


