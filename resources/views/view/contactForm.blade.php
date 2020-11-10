<form action="{{ route('contact') }}" method="post">
    @csrf
    <div style="margin: 5px;">Họ và tên</div>
    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
        <input type="text" name="name" class="form-control" placeholder="Họ và tên"
            value="{{ old('name') }}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('name'))
        <span class="text-danger help-block">
            <em>{{ $errors->first('name') }}</em>
        </span>
        @endif
    </div>
    <div style="margin: 5px;">Email</div>
    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" name="email" class="form-control" placeholder="Email"
            value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <span class="text-danger help-block">
            <em>{{ $errors->first('email') }}</em>
        </span>
        @endif
    </div>
    <div style="margin: 5px;">Ngày sinh</div>
    <div class="form-group {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
        <input style="padding-right: 5px;" type="date" name="date_of_birth" class="form-control"
            placeholder="Ngày sinh" value="{{ old('date_of_birth') }}">
        @if ($errors->has('date_of_birth'))
        <span class="text-danger help-block">
            <em>{{ $errors->first('date_of_birth') }}</em>
        </span>
        @endif
    </div>
    <div style="margin: 5px;">Địa chỉ hiện tại</div>
    <div class="form-group has-feedback{{ $errors->has('address') ? ' has-error' : '' }}">
        <input type="address" name="address" class="form-control" placeholder="Địa chỉ"
            value="{{ old('address') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('address'))
        <span class="text-danger help-block">
            <em>{{ $errors->first('address') }}</em>
        </span>
        @endif
    </div>
    <div style="margin: 5px;">Số điện thoại</div>
    <div class="form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
        <input type="phone" name="phone" class="form-control" placeholder="Số điện thoại"
            value="{{ old('phone') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('phone'))
        <span class="text-danger help-block">
            <em>{{ $errors->first('phone') }}</em>
        </span>
        @endif
    </div>
    <div style="margin: 5px;">Đăng ký tư vấn chương trình</div>
    @if(isset($newssingle)&&isset($newssingle->title))
    <div class="form-group has-feedback{{ $errors->has('orders') ? ' has-error' : '' }}">
        <input type="text" id="orders" name="orders"
            class="form-control has-feedback{{ $errors->has('orders') ? ' has-error' : '' }} placeholder="Số điện thoại"
                value="{{ $newssingle->title }}" readonly>
        @if ($errors->has('orders'))
        <span class="text-danger help-block">
            <em>{{ $errors->first('orders') }}</em>
        </span>
        @endif
    </div>
    @else
    <div class="form-group has-feedback{{ $errors->has('orders') ? ' has-error' : '' }}">
        <select id="orders" name="orders"
            class="form-control has-feedback{{ $errors->has('orders') ? ' has-error' : '' }}">
            @foreach($arrCategory as $key => $topnews)
            @if (old('orders') == $topnews->name)
            <option selected value="{{$topnews->name}}">{{$topnews->name}}</option>
            @endif
            @if (old('orders')!= $topnews->name)
            <option value="{{$topnews->name}}">{{$topnews->name}}</option>
            @endif
            @endforeach
        </select>
        @if ($errors->has('orders'))
        <span class="text-danger help-block">
            <em>{{ $errors->first('orders') }}</em>
        </span>
        @endif
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <button class="btn mag-btn mt-30" type="submit">Gởi</button>
        </div>
    </div>

</form>