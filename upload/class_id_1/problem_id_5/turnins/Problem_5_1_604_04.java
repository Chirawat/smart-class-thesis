package problem_5_1_604_04;

import java.util.Scanner;

public class problem_5_1_604_04 {
    public static void main(String[] args) {
	System.out.print("Enter velovity: ");
	Scanner kb = new Scanner(System.in);
int v = kb.nextInt();//รับความเร็ว

 System.out.print("Enter time(s): ");
int t = kb.nextInt();//รับเวลา

	System.out.println("Distance:");
	
	for(int i=0; i<=t; i++){
	 	System.out.println("t = " + i + " :  S = " + v*i); // คำนวณ
	}
	 }
    
}
