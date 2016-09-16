
package problem_5_1_604_20;

import java.util.Scanner;

public class problem_5_1_604_20 {
    public static void main(String[] args) {
        System.out.print("Enter velovity(m/s): ");
        Scanner kb = new Scanner(System.in);
	int v = kb.nextInt();//รับความเร็ว
	
	System.out.print("Enter time(s): ");
	int t = kb.nextInt(); // รับเวลา
	
	System.out.println("Distance:");
	for(int i=0; i<=t; i++){
		System.out.println("t = " + i + " :  S = " + v*i); //คำนวณระยะทาง
        }
    }
    
}
