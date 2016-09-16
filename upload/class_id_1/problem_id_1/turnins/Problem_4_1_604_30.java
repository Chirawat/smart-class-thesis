package problem_4_1_604_30;
import java.util.Scanner;
public class Problem_4_1_604_30 {
     public static void main(String[] args) {
         System.out.println("Product Price : ");
         
         Scanner keyboard = new Scanner (System.in);
         int price = keyboard.nextInt();
         
         System.out.println("Cash : ");
         int cash = keyboard.nextInt();
         
         System.out.println("Change : ");
         System.out.println(cash-price);//คำนวนเงินทอน
   
    }
    
}
