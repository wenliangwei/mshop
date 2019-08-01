<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>展示</title>
    <link href="{{asset('css/page2.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <form>
            <input type="text" name="dian" value="{{$query['dian']??''}}" placeholder="请输入出发地关键字">
            <input type="text" name="dao" value="{{$query['dao']??''}}" placeholder="请输入到达地关键字">
            <button>搜索</button>
    </form>
    <table border="1">
        <tr align="center">
            <td>车次</td>
            <td>出发地</td>
            <td>出发时间</td>
            <td>到达地</td>
            <td>到达时间</td>
            <td>价钱</td>
            <td>火车票数量</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr align="center">
            <td>{{$v->checi}}</td>
            <td>{{$v->dian}}</td>
            <td>{{$v->add_time}}</td>
            <td>{{$v->dao}}</td>
            <td>{{$v->dao_time}}</td>
            <td>{{$v->price}}</td>
            <td>
                @if($v->number == 0)
                    <b style="color:red;">无票</b>
                @elseif($v->number >= 100)
                    <b style="color:black;">有票</b>
                @else
                    <b style="color:blue;">{{$v->number}}</b>
                @endif
            </td>
            <td>
                @if($v->number == 0)
                    <a href="javascript:;"><b style="color:red;">没票</b></a>
                @elseif($v->number>0)
                    <a href="{{url('che/edit',['id'=>$v->id])}}"><b style="color:black;">抢票</b></a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    {{$data->appends($query)->links()}}
</body>
</html>