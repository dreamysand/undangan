<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allura&family=Faustina:ital,wght@0,300..800;1,300..800&family=GFS+Didot&family=Ibarra+Real+Nova:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Katibeh&display=swap" rel="stylesheet">
</head>
<body class="relative min-h-screen flex">
	<div class="w-[60%] h-screen bg-black">
		
	</div>
	<div class="w-[40%] h-screen bg-white overflow-scroll">
		<div class="h-[50%] bg-[#DBE5FF] flex justify-center items-center text-center flex-col relative">
			<h1 class="text-[clamp(2rem,4vw,4rem)] text-[#0A2C82] font-[Katibeh] my-4">JOBFAIR'S</h1>
			<h1 class="text-[clamp(1.5rem,3vw,3rem)] text-black font-[Ibarrarealnova] my-4">SMK Negeri 71 Jakarta</h1>
			<h1 class="text-[clamp(1.25rem,1.5vw,2rem)] font-bold text-[#0A2C82] font-[Inter] my-4">13.03.2025</h1>
			<div class="absolute bottom-0 left-0 w-full h-[10%] bg-gradient-to-t from-white to-transparent"></div>
		</div>
		<div class="h-fit bg-white flex justify-center items-center my-9">
			<div class="w-[80%] h-[50vh]">				
				<div class="overflow-hidden bg-transparent rounded-[2rem]">
					<img src="asset/schoolview.jpg" class="w-full h-full object-cover border-[15px] shadow-2xl border-[#ADAEC0] rounded-[2rem]" alt="Logo">				
				</div>
			</div>
		</div>
		<div class="h-fit bg-white flex justify-center">
		  <p class="text-[clamp(1rem,1vw,1.5rem)] text-center text-black font-[Ibarrarealnova] my-4 mx-3">
		  	"Di antara langkah awal menuju masa depan yang gemilang adalah
memanfaatkan setiap peluang yang ada. SMKN 71 Jakarta dengan
bangga mengundang Anda untuk hadir di Job Fair 2025, di mana
kesempatan berharga bertemu dengan usaha keras dan talenta
Anda. Temukan pekerjaan impian Anda, kenali perusahaan-perusahaan terbaik, dan mulailah perjalanan baru menuju
kesuksesan."
		  </p>
		</div>
		<div class="h-fit bg-white flex justify-center text-center flex-col">
			<h1 class="text-[clamp(2rem,4vw,4rem)] text-[#0A2C82] font-[Allura] my-4">Save The Date</h1>
			<div class="grid grid-cols-4 gap-1 mb-7">
				<div class="p-1">
					<h3 class="text-[clamp(0.75rem,4vw,4rem)] text-center font-[GFSDidot] font-semibold" id="days"></h3>
					<h3 class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]">Days</h3>
				</div>
				<div class="p-1">
					<h3 class="text-[clamp(0.75rem,4vw,4rem)] text-center font-[GFSDidot] font-semibold" id="hours"></h3>
					<h3 class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]">Hours</h3>
				</div>
				<div class="p-1">
					<h3 class="text-[clamp(0.75rem,4vw,4rem)] text-center font-[GFSDidot] font-semibold" id="minutes"></h3>
					<h3 class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]">Mins</h3>
				</div>
				<div class="p-1">
					<h3 class="text-[clamp(0.75rem,4vw,4rem)] text-center font-[GFSDidot] font-semibold" id="seconds"></h3>
					<h3 class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]">Secs</h3>
				</div>
			</div>
		</div>
		<div class="h-fit bg-white flex justify-center my-4">
			<img src="asset/sponsor.jpg" class="w-[90%] h-auto object-cover" alt="Logo">				
		</div>
	</div>
	<script>
		let event_date = <?= strtotime($acara['f_tanggal_acara']); ?> * 1000;

		function Countdown() {
			let present_time = new Date().getTime();
			let time_difference = event_date-present_time;

			if (time_difference>0) {
				let days = Math.floor(time_difference / (1000 * 60 * 60 * 24));
				let hours = Math.floor(time_difference % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
				let minutes = Math.floor(time_difference % (1000 * 60 * 60) / (1000 * 60));
				let seconds = Math.floor(time_difference % (1000 * 60) / (1000));

				document.getElementById('days').innerText = days;
				document.getElementById('hours').innerText = hours;
				document.getElementById('minutes').innerText = minutes;
				document.getElementById('seconds').innerText = seconds;
			} else {
				document.getElementById('days').innerText = "00";
				document.getElementById('hours').innerText = "00";
				document.getElementById('minutes').innerText = "00";
				document.getElementById('seconds').innerText = "00";
				clearInterval(interval);
			}
		}

		let interval = setInterval(Countdown, 1000);
		Countdown();
	</script>
</body>
</html>