
package problem_4_1_604_23;
import java.util.Scanner;
public class Problem_4_1_604_23 {

    public static void main(String[] args) {
      System.out.print("Product Price : ");
      
      Scanner keyboard = new Scanner(System.in);
      int price = keyboard.nextInt();
      
      System.out.print("cash : ");
      int cash = keyboard.nextInt();
      
      System.out.print("chang : ");
      System.out.print(cash-price); //คำนวณเงินทอน
    }
    
}
