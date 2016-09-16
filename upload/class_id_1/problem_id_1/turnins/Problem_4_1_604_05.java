/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package problem_4_1_604_05;
import java.util.Scanner;
/**
 *
 * @author ADMIN
 */
public class problem_4_1_604_05 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.print("Product Price :");
        
        Scanner keyboard = new Scanner(System.in);
        int price = keyboard.nextInt();
        
        System.out.print("cash : ");
        int cash = keyboard.nextInt();

        System.out.print("Change :");
        System.out.println(cash-price);
    }
    
}
