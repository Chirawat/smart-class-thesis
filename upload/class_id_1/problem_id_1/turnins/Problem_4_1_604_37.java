package problem_4_1_604_37;
import java.util.Scanner;
public class Problem_4_1_604_37 {
    public static void main(String[] args) {
        System.out.print("Product Price : ");
        
        Scanner Keybord = new Scanner(System.in);
        int price = Keybord.nextInt();
        
        System.out.print("Cash : ");
        int Cash = Keybord.nextInt();
        
        System.out.print("Change : "); 
        System.out.print(Cash-price); // คำนวณเงินทอน
        
    }
    
    
}
