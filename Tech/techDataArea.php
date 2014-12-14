<style>
	#tableHeader {
		width: 100%;
		position: relative;
		display:table;
		top: 0px;
		left: 0px;
		height: 5%;
		background-color: #333;
		border-top: solid 1px #CCC;
		color: #CCC;	
		font-size: 18px;
		padding: 5px;
		text-align: left;
	}
	.subAssyCont{
		position:relative;
		overflow-y: auto;
		width:100%;
		height: 95%;
	}
	.itemCheckCont{
		width:100%;
		padding: 10px 0 10px 0;
		border-bottom: 2px solid #000000;
		display: table;
	}
	.description{
		display:table-cell;
		vertical-align:middle;
		width:35%;
		padding: 5px;
		height:auto;
	}
	.condition{
		display:table-cell;
		vertical-align:middle;
		width: 20%;
		padding: 5px;
	}
	.condition select{
		width: 80%;
		min-width: 125px;
	}
	.comments{
		display:table-cell;
		vertical-align:middle;
		width: 35%;
		padding: 5px;
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