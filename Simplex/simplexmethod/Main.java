/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package simplexmethod;

import static javax.swing.JFrame.EXIT_ON_CLOSE;

/**
 *
 * @author Reed
 */
public class Main
{
    public static void main(String[] args)
    {
        SimplexMethod sm = new SimplexMethod("Simplex Method");
        sm.setSize(800,600);
        sm.setVisible(true);
        sm.setDefaultCloseOperation(EXIT_ON_CLOSE);
        sm.setResizable(false);
    }
}
