<html><head>
<title>easyXDM</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://23dbd2b813a5bbdcf94f-ad7ae67fe93983be12b9863528b62e99.r9.cf1.rackcdn.com/easyXDM.min.js" type="text/javascript">

</script>
<script type="text/javascript">
var iframe;
var socket = new easyXDM.Socket({
	swf: "http://23dbd2b813a5bbdcf94f-ad7ae67fe93983be12b9863528b62e99.r9.cf1.rackcdn.com/easyxdm.swf",
	onReady: function(){
                                iframe = document.createElement("iframe");
                                iframe.frameBorder = 0;
                                document.body.appendChild(iframe);
                                iframe.src = easyXDM.query.url;
	},
	onMessage: function(url, origin){
                                iframe.src = url;
                                console.log('authhelper:'+url);
	}
});
</script>
<style type="text/css">
html, body {
overflow: hidden;
margin: 0px;
padding: 0px;
width: 100%;
height: 100%;
}

iframe {
width: 100%;
height: 100%;
border: 0px;
}
</style>
</head>
<body>


</body></html>