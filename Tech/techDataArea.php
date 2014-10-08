<style>
	#tableHeader {
		width: 100%;
		position: absolute;
		top: 0px;
		left: 0px;
		height: 20px;
		background-color: #333;
		border-top: solid 1px #CCC;
		color: #CCC;	
		font-size: 14px;
		padding: 2px;
		text-align: center;
	}
	.subAssyCont{
		position:absolute;
		overflow:auto;
		margin-top:20px;
		width:100%;
		height: 90%;
	}
	.itemCheckCont{
		width:100%;
		padding-left:2%;
		padding-bottom:10px;
		padding-top:10px;
		border-bottom: 2px solid #000000;
		display: table;
	}
	.description{
		display:table-cell;
		vertical-align:middle;
		width:35%;
		padding-right: 2%;
		height:auto;
	}
	.condition{
		display:table-cell;
		vertical-align:middle;
		width: 20%;
		padding-right:2%;
	}
	.condition select{
		width: 80%;
		min-width: 125px;
	}
	.comments{
		display:table-cell;
		vertical-align:middle;
		width: 35%;
		padding-right:2%;
	}
	.picture{
		display:table-cell;
		vertical-align:middle;
		width: 8%;
	}
	#calendar{
		position: absolute;
		top: -20px;
	}
</style>

<div id="calendar"><a href="#">Select Date Range</a></div>

<div id="include"><h2>Select option from left - Tech</h2></div><!--Id for inserting-->