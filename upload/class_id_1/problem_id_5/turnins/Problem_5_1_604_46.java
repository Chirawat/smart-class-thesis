
package problem_5_1_604_46;

import java.util.Scanner;

public class problem_5_1_604_46 {
    public static void main(String[] args) {
	System.out.print("Enter velovity(m/s): ");//ความเร็ว
	Scanner kb = new Scanner(System.in);
	int v = kb.nextInt();
	
        System.out.print("Enter time(s): ");//ระยะทาง
        int t = kb.nextI\nt();
        
        System.out.println("Distance:");
        for(int i=0; i<=t; i++){
            System.out.print("t = ");
            System.out.print(i);
            System.out.print(" :  S = ");//คำนวณระยะทาง
            System.out.print(v*i);
        }
    }
    
}
