/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package problem_4_1_604_03;
import java.util.Scanner ;
public class problem_4_1_604_03 {

    public static void main(String[] args) {
    System.out.print("Product price : ");
    Scanner keyboard = new Scanner (System.in);  
    int price = keyboard.nextInt();
    
    System.out.print("Cash : ");
    int cash = keyboard.nextInt();
    System.out.print("Change : ");
    System.out.println(cash-price);
    
    }
}
