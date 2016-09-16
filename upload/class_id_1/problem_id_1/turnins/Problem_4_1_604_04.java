

 
 
 
package problem_4_1_604_04;
import java.util.Scanner;
public class Problem_4_1_604_04 {
     public static void main(String[] args) {
      System.out.print ("product price : ");
      
      Scanner keyboard = new Scanner(System.in);
      int price = keyboard.nextInt();
      
      System.out.print("cash : "); 
      int cash = keyboard.nextInt();
      System.out.print("change : ");
      System.out.print(cash-price); // คำนานเงินทอน
      
      
    }
    
}
