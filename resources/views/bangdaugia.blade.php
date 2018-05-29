
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Tên</th>
      <th>Giá đấu</th>
      <th>Thời gian đấu giá</th>
    </tr>
  </thead>
  <tbody>
  	@if($bidders->get(0) )
  	<?php  $i = 0; ?>
  	@foreach($bidders as $bidder)
		<?php  $i++;?>
    <tr>
      <td><?php  echo $i; ?></td>
      <td>{{$bidder->name}}</td>
      <td>{{number_format($bidder->bid_price)}}VND</td>
      <td>{{$bidder->created_at}}</td>
    </tr>
    @endforeach
    @endif
</table>
</div>     