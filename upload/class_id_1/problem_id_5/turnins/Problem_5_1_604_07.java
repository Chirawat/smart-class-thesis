package problem_4_1_604_07;

import java.util.Scanner;

public class problem_4_1_604_07 {
    public static void main(String[] args) {
        Scanner kb = new Scanner(System.in);
        int v = kb.nextInt();
        System.out.print("Enter time");
        int t = kb.nextInt();
        System.out.println("Distance");
        for(int i=0; i<=t; i++){
            System.out.println("t = " + i + " :  S = " + v*i);
        }
    }
    
}
