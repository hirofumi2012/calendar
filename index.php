<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>カレンダー</title>
</head>
<?php
$timestamp = filter_input( INPUT_GET, 'month', FILTER_CALLBACK, [ 'options' => 'strtotime' ] ) ?: time();
?>
<body>
	<h1>カレンダー</h1>

	<div class="calendar">
		<div class="nav">
			<form action="/">
				<input type="month" name="month" value="<?php echo date( 'Y-m', $timestamp ); ?>">
				<button>移動</button>
			</form>
		</div>
		<table>
			<thead>
				<tr>
					<th>日</th>
					<th>月</th>
					<th>火</th>
					<th>水</th>
					<th>木</th>
					<th>金</th>
					<th>土</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$lastday = date( 't', $timestamp );
					$sunday = 1 - date( 'w', $timestamp );
					while ( $sunday <= $lastday ) {
						echo '<tr>';
						$day = $sunday;
						$sunday += 7;
						while ( $day < $sunday ) {
							echo '<td>';
							if ( $day >= 1 && $day <= $lastday ) {
								echo $day;
							}
							echo '</td>';
							$day++;
						}
						echo '</tr>', PHP_EOL;
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
