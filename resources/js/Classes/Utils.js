export default class Utils {
	static randomString(length, characters = '0123456789abcdefghijklmnopqrstuvwxyz'){
		let randomString = '';
		
		while(randomString.length < length){
			randomString += characters.charAt(Math.floor(Math.random() * characters.length));
		}

		return randomString;
	}
}
