export default class TimeHelper {
	static days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	static months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	static getOrdinal(day){
		switch(day){
			case 1:
			case 21:
			case 31:
				return 'st';
				break;
			
			case 2:
			case 22:
				return 'nd';
				break;
	
			case 3:
			case 23:
				return 'rd';
				break;
		
			default:
				return 'th';
				break;
		}
	}
}
