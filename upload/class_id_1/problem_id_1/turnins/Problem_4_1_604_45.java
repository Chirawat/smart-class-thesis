
package problem_4_1_604_45;
import java.util.Scanner;
public class Problem_4_1_604_45 {

    public static void main(String[] args) {
        System.out.println("Product Price : ");
        
        Scanner keyboard = new Scanner(System.in);
        int price = keyboard.nextInt();
        
        
        System.out.println("Cash : ");
        int cash = keyboard.nextInt();
        
        
        System.out.println(cash-price);
    }
    
}
