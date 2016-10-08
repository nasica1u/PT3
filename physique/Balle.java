/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package physique;

/**
 *
 * @author Reed
 */
public class Balle extends Objet
{
    double i = 0;
    
    public Balle(double x, double y, double vx, double vy, double ax, double ay, double h, double l)
    {
        super(x,y,vx,vy,ax,ay,h,l);
    }
}

/*
double vitesse;
        vitesse=Math.sqrt(vx*vx+vy*vy); //vitesse + haute = saut + long => pixel/sec (ici 7p/s)
        int i=1;
        while(i < 100)
        {
            i++;
            x=x+1;
            y=y-1;
            System.out.println(x+";"+y);
        }
        i = i+0.1;
        y=y+ (int) ((Math.cos(i)+Math.sin(i))*4);
*/