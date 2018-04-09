
//flag ==1：降序。 falg==2：升序
function sort(arr,flag=1){

	for(var j=0;j<arr.length-1;j++){
	//两两比较，如果前一个比后一个小，则交换位置。
	   for(var i=0;i<arr.length-1-j;i++){
			if(arr[i]<arr[i+1]){
				var temp = arr[i];
				arr[i] = arr[i+1];
				arr[i+1] = temp;
			}
		} 
	}

	return arr ;
}