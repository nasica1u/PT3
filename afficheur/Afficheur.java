/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package afficheur;

import java.awt.*;
import javax.swing.*;
import physique.*;

/**
 *
 * @author Reed
 */
public class Afficheur  extends JPanel
{    
    protected Monde m;
    
    public Afficheur(Monde m)
    {
        this.m=m;
    }
    
    @Override
    public void paintComponent(Graphics g)
    {
        int x,y;
        super.paintComponent(g);
        setBackground(Color.CYAN);
        g.setColor(Color.black);
        g.drawLine(0, 727, 800, 727); //fixe => sol
        x=(int) m.b.getX();
        y=(int) m.b.getY();
        g.drawOval(x, y, 25, 25);
        g.fillOval(x, y, 25, 25);
    }
    
    public void render()
    {
        repaint();
    }
}
