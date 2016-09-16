/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package problem_4_1_604_08;

/**
 *
 * @author ADMIN
 */
import java.util.Scanner;
public class Problem_4_1_604_08 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
      System.out.println("Product Price : ");
      
      Scanner keyboard = new Scanner(System.in);
      int price = keyboard.nextInt();
      
      System.out.println("Cash : ");
      int cash = keyboard.nextInt();
      System.out.println("Change : ");
      System.out.println(cash-price);
      
    }
    
}
