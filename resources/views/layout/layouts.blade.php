@section('title')
cross site request
@stop
@section('body')
<form action='' method='post'>
    <div class='product'>
        <strong>Product</strong>
        <div class=''>
            Quantity:<input type='text' name='Quantity'>
            <input type="submit" value="Order">
            <input type="hidden" name="product" value="1">
           
        </div>
    </div>
</form>
@stop