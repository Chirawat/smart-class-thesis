
package problem_5_1_604_30;

import java.util.Scanner;

public class problem_5_1_604_30 {
    public static void main(String[] args) {
        System.out.println("Formula: S=v*t");
        System.out.print("Enter velovity(m/s): ");//รับความเร็ว
        Scanner kb = new Scanner(System.in);
        int v = kb.nextInt();
        
        System.out.print("Enter time(s): ");//รับเวลา
        int t = kb.nextInt();
        
        // loop
        System.out.println("Distance:");
        for(int i=0; i<=t; i++){
            System.out.println("t = " + i + " :  S = " + v*i);//ระยะทาง
        }
    }
}
