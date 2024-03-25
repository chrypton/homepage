<template>
	<header>
		<time :datetime="strDateTime">{{ this.strDate }}</time>
		<time :datetime="strDateTime">{{ this.strTime }}</time>
		<div>
			<a :href="route('users.logout')">Log Out</a>
		</div>
	</header>
</template>

<script>
import TimeHelper from '@/Classes/TimeHelper.js';

export default {
	name: 'Header',
	data(){
		return {
			strDateTime: undefined,
			strDate: undefined,
			strTime: undefined,
		}
	},
	methods: {
		lPad(input, digits = 2, filler = '0'){
			return String(input).padStart(digits, filler);
		},
		updateClock(){
			const currentTime = new Date();
		
			let currentHour = currentTime.getHours();
			const currentMinute = this.lPad(currentTime.getMinutes());
			const currentSecond = this.lPad(currentTime.getSeconds());
		
			let period = 'AM';
		
			if(currentHour === 0){
				currentHour = 12;
			} else if(currentHour >= 12){
				if(currentHour >= 13){
					currentHour -= 12;
				}
		
				period = 'PM';
			}
		
			this.strTime = `${currentHour}:${currentMinute}:${currentSecond} ${period}`;
		
			const currentDay = TimeHelper.days[currentTime.getDay()];
			const currentMonth = TimeHelper.months[currentTime.getMonth()];
			const currentDate = currentTime.getDate();
			const currentOrdinal = TimeHelper.getOrdinal(currentDate);
			const currentYear = currentTime.getFullYear();

			this.strDate = `${currentDay}, ${currentMonth} ${currentDate}${currentOrdinal}, ${currentYear}`;
		},
	},
	created(){
		const currentTime = new Date();

		const currentYear = currentTime.getFullYear();
		const currentMonth = this.lPad(currentTime.getMonth() + 1);
		const currentDate = this.lPad(currentTime.getDate());
		const currentHour = this.lPad(currentTime.getHours());
		const currentMinute = this.lPad(currentTime.getMinutes());

		this.strDateTime = `${currentYear}-${currentMonth}-${currentDate} ${currentHour}:${currentMinute}`;

		this.updateClock();

		setInterval(() => {
			this.updateClock();
		}, 1000);
	},
}
</script>

<style>
header {
	background-image: var(--title-gradient);
	border-color: var(--border-color);
	border-style: solid;
	border-width: 0rem 0.125rem 0.125rem 0.125rem;
	color: var(--text-light);
	display: flex;
	flex-direction: row;
	grid-column: 1 / span 2;
	padding: 0.5rem 1rem 0.5rem 1rem;
}

header > * {
	flex: 1 1 0;
}

header > :nth-child(1) {
	text-align: left;
}

header > :nth-child(2) {
	text-align: center;
}

header > :nth-child(3) {
	text-align: right;
}
</style>