<?php
	$player = 'x';
	$canPlay = true;
	$board = array(
		['-', '-', '-'],
		['-', '-', '-'],
		['-', '-', '-']
	);


    	function show($b) {
		for ($i = 0; $i < count($b); $i++) {
			if ($i === 0) {
				echo "\n";
			}
			
			echo $b[$i][0] . " | " . $b[$i][1] . " | " . $b[$i][2] . "\n";
		}
	}


    	function switchPlayer() {
		global $player;
		
		if ($player === 'x') {
			$player = 'y';
		} else {
			$player = 'x';
		}
	}


    	function play($x, $y) {
		global $board;
		global $player;
		global $canPlay;
		
		if ($board[$x][$y] === '-' && $canPlay) {
			$board[$x][$y] = $player;

			if (checkWin()) {
				echo "Player $player won!!!";
				$canPlay = false;
				return;
			}
		
			switchPlayer();
		}
	}


    	function checkWin() {
		global $board;
		
		$hori1 = $board[0][0] === $board[0][1] && $board[0][1] === $board[0][2] && $board[0][0] !== '-';
		$hori2 = $board[1][0] === $board[1][1] && $board[1][1] === $board[1][2] && $board[1][0] !== '-';
		$hori3 = $board[2][0] === $board[2][1] && $board[2][1] === $board[2][2] && $board[2][0] !== '-';

		$vert1 = $board[0][0] === $board[1][0] && $board[1][0] === $board[2][0] && $board[0][0] !== '-';
		$vert2 = $board[0][1] === $board[1][1] && $board[1][1] === $board[2][1] && $board[0][1] !== '-';
		$vert3 = $board[0][2] === $board[1][2] && $board[1][2] === $board[2][2] && $board[0][2] !== '-';

		$diag1 = $board[0][0] === $board[1][1] && $board[1][1] === $board[2][2] && $board[0][0] !== '-';
		$diag2 = $board[0][2] === $board[1][1] && $board[1][1] === $board[2][0] && $board[0][2] !== '-';

		return $vert1 || $vert2 || $vert3 || $hori1 || $hori2 || $hori3 || $diag1 || $diag2;
	}


    play(2, 2);
	play(2, 1);
	play(1, 1);
	play(2, 0);
	play(0, 0);
	play(0, 1);
	show($board);

