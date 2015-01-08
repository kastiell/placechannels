
<style>
    .grid:after{
        clear:both;
        content:'';
        display: table;
    }

    [class*='c-']{
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        float:left;
    }

    .clearfix{
        clear:both;
    }

    body{
        font-family: arial,sans-serif;
        font-size: 13px;
    }

    .wmodule{
        width: 250px;
        border: 1px solid #D3D3D3;
        padding: 10px;
        box-sizing: border-box;
    }

    .wmodule .c-item,.wmodule .c-title{
        width: 100%;
    }

    .c-item:before{
        content: ' ';
        background-color: #5f8fc9;
        color: #5f8fc9;
        width: 10px;
        height: 10px;
        border-radius: 5px;
        float: left;
        margin: 5px;
    }

    .percent{
        font-weight: bold;

    }

    .c-title{
        text-transform: uppercase;
        color: #6D6D6D;
        font-size: 13px;
        font-weight: bold;
        padding: 6px;
        box-sizing: border-box;
    }
</style>

<div class="grid wmodule" >
    <div class="c-title">
        Тип пристрою
    </div>
    <div class="c-item">
        DESCTOP <span class="percent">100%</span>
    </div>
    <div class="c-item">
        TAB
    </div>
    <div class="c-item">
        MOBILE
    </div>
    <div class="c-item">
        TV
    </div>
</div>