
package problem_5_1_604_11;

import java.util.Scanner;

public class problem_5_1_604_11 {
    public static void main(String[] args) {
        System.out.print("Enter velovity");//ความเร็ว
         Scanner kb = new Scanner(System.in);
        int v = kb.nextInt();
        
		
        System.out.print("Enter time");//เวลา
        int t = kb.nextInt();
		
        System.out.println("Distance:");
        for(int i=0; i<=t; i++){
            System.out.println("t = " + i + " :  S = " + v*i);//ระยะทาง
        }
    }
    
}
