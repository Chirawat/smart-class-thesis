/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package problem_4_1_604_02;
import java.util.Scanner;
public class problem_4_1_604_02 {
    public static void main(String[] args) {
        
    Scanner in = new Scanner (System.in);
    System.out.print("ราคาสินค้า : ");  
    float price = in.nextFloat();
    System.out.print("เงินสด : " );
    float cash = in.nextFloat();
    if(price>=cash) {
    System.out.println("เงินไม่พอ  ");
    }
     else { 
         
    
    System.out.print("เงินทอน : " );
    
   
    System.out.println(cash-price);
    
        }
    
}
